<?php
namespace App\Http\Controllers\Admin;
use App\Program;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Validator;
class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == 1) $users = User::paginate(30);
        else $users = User::where('role_id', 4)->where('is_hide', 0)->paginate(30);
        return view('admin.users.index', compact('users'));
    }
    public function search_index(Request $request)
    {
        if (Auth::user()->role_id == 1) $users = User::where('name', 'like', '%'.$request->name.'%')->paginate(30);
        else $users = User::where('role_id', 4)->where('is_hide', 0)->where('name', 'like', '%'.$request->name.'%')->paginate(30);
        return view('admin.users.index', compact('users'));
    }
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::pluck('name', 'id');
        $programs = Program::where('is_hide', false)->get();
        return view('admin.users.edit', compact('user', 'roles', 'programs'));
    }
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.users.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'login' => 'string|max:255|regex:/^[\w-]*$/|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($request->input('role_id') == null) $role_id = 4;
        if ($request->input('login') == null) $login = str_slug($request->input('name')).'_'.time();
        if ($request->input('rang') == null) $rang = 'Ученик';

        $user = User::create([
            'login' => $login,
            'rang' => $request->input('rang'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'rang' => $rang,
            'password' => bcrypt($request->input('password')),
            'ip_address' => $request->ip(),
            'is_verified' => true,
            'role_id' => $role_id
        ]);
        \Mail::send('emails.confirm', array('login' => $user->login, 'password' => $request->input('password')), function ($message) use ($user) {
            $message->to($user->email, $user->name)->subject('Заявка на обучение');
        });
        return redirect('admin/users/'. $user->id)
            ->with([
                'flash_message' => 'Вы успешно создали аккаунт '.$request->input('login'),
                'flash_message_status' => 'success',
            ]);
    }
    public function update_info(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|string|max:255|regex:/^[\w-]*$/|unique:users,login,'.$id,
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'role_id' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect(url()->previous() . '#info')
                ->withErrors($validator)
                ->withInput();
        }
        User::where('id', $id)
            ->update([
                'login' => $request->input('login'),
                'rang' => $request->input('rang'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role_id' => $request->input('role_id')
            ]);
        return redirect(url()->previous() . '#info')
            ->with([
                'flash_message' => 'Вы успешно обновили информацию профиля',
                'flash_message_status' => 'success',
            ]);
    }
    public function update_password(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return redirect(url()->previous() . '#password')
                ->withErrors($validator)
                ->withInput();
        }
        User::where('id', $id)
            ->update([
                'password' => bcrypt($request->input('password')),
            ]);
        return redirect(url()->previous() . '#password')
            ->with([
                'flash_message' => 'Вы успешно обновили пароль',
                'flash_message_status' => 'success',
            ]);
    }
    public function update_photo(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        ]);
        if ($validator->fails()) {
            return redirect(url()->previous() . '#password')
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::where('id', $id)->first();
        $photo = $request->file('photo');
        $filename = $user->login .'.'. $photo->getClientOriginalExtension();
        Image::make($photo)
            ->fit(200)
            ->save(public_path('images/users/'. $filename));
        User::where('id', $id)
            ->update([
                'photo' => $filename,
            ]);
        return redirect(url()->previous() . '#photo')
            ->with([
                'flash_message' => 'Вы успешно обновили фотографию профиля',
                'flash_message_status' => 'success',
            ]);
    }
    public function delete(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        User::where('id', $id)
            ->update([
                'is_hide' => true,
            ]);
        return redirect('admin/users/')
            ->with([
                'flash_message' => 'Вы успешно удалили профиль '. $user->login,
                'flash_message_status' => 'success',
            ]);
    }
    public function restore(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        User::where('id', $id)
            ->update([
                'is_hide' => false,
            ]);
        return redirect(url()->previous())
            ->with([
                'flash_message' => 'Вы успешно восстановили профиль '. $user->login,
                'flash_message_status' => 'success',
            ]);
    }
    public function add_program(Request $request, $id, $program_id)
    {
        $user = User::where('id', $id)->first();

        if ($user->programs->where('id', $program_id)->count() == 0) {
            $user->update(['is_verified' => true]);
            $user->programs()->attach($program_id, ['deleted_at' => Carbon::now()->addWeeks(2)]);
            return redirect(url()->previous())
                ->with([
                    'flash_message' => 'Вы успешно подключили программу',
                    'flash_message_status' => 'success',
                ]);
        }
        return redirect(url()->previous());
    }
    public function delete_program(Request $request, $id, $program_id)
    {
        $user = User::where('id', $id)->first();

        if ($user->programs->where('id', $program_id)->count() > 0) {
            $user->programs()->detach($program_id);
            return redirect(url()->previous())
                ->with([
                    'flash_message' => 'Вы успешно отключили программу',
                    'flash_message_status' => 'success',
                ]);
        }
        return redirect(url()->previous());
    }
}