<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ThreadBeanPHP\C as C;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class AgentController extends Controller
{
	public function Create(Request $req) {
		$req -> validate([
			'org' => 'required|numeric',
			'login' => 'required|min:4|max:40|regex:/^[a-z0-9_]*$/',
			'password' => 'required|min:6|max:128|regex:/^[a-zA-Z0-9_]*$/',
			'description' => 'max:140'
		]);

		if(C::count('companys', 'id = ?', [$req -> org]) <= 0) {
			return redirect() -> back() -> withErrors(['org' => 'Такой компании не существует!']);
		}

		if(C::count('agents', 'login = ?', [$req -> login]) > 0) {
			return redirect() -> back() -> withErrors(['login' => 'Такой пользователь уже существует!']);
		}

		$agent = C::dispense("agents");

		$agent -> login = $req -> login;
		$agent -> password = hash('sha256', $req -> password);
		$agent -> company = $req -> org;
		$agent -> permission = "agent";
		$agent -> description = $req -> description;

		C::store($agent);

		return redirect() -> route('admin') -> with('success', 'Администратор "'.$req -> login.'" создан ✔️');
	}

	public function Update(Request $req) {
		$req -> validate([
			'id' => 'required|numeric',
			'org' => 'required|numeric',
			'login' => 'required|min:4|max:40|regex:/^[a-z0-9_]*$/',
			'description' => 'max:140'
		]);

		if(C::count('companys', 'id = ?', [$req -> org]) <= 0) {
			return redirect() -> back() -> withErrors(['org' => 'Такой компании не существует!']);
		}

		if(C::count('agents', 'id != ? AND login = ?', [$req -> id, $req -> login]) > 0) {
			return redirect() -> back() -> withErrors(['login' => 'Такой Агент уже существует!']);
		}

		$agent = C::findOne("agents", "id = ?", [$req -> id]);

		$agent -> company = $req -> org;
		$agent -> login = $req -> login;
		$agent -> description = $req -> description;

		C::store($agent);

		return redirect() -> route('admin') -> with('success', 'Агент "'.$req -> login.'" изменён ✔️');
	}

	public function Delete(Request $req) {
		if(isset($req -> id)) {
			$agent = C::findOne("agents", "id = ?", [$req -> id]);
			C::trash($agent);
			return "OK";
		} else {
			return "ERR";
		}
	}

	public function UpdateData(Request $req) {

		$req -> validate([
			'id' => 'required|numeric',
			'full_name' => 'required|min:4|max:40',
			'about' => 'required|min:8|max:140',
			'phone' => 'max:255',
			'email' => 'max:255',
			'address' => 'max:255',
			'telegram' => 'max:255',
		]);

		$agent = C::findOne("agents", "id = ?", [$req -> id]);
		
		if($req -> avatar_state == "remove" || empty($req -> avatar_state))  {

			File::delete(public_path('uploads/avatar/').@$agent -> avatar);
			$agent -> avatar = "";

		} elseif(isset($req -> avatar)) {

			$file = $req -> avatar;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['avatar' => 'Аватар долженбыть в формате PNG или JPG(JPEG) !']);
			}

			if(($size > MAX_AVATAR_WEIGHT) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['avatar' => 'Аватар слишком тажёлый!']);
			}

			$avatar_path = date("YmdHis").rand(0, 99999999).".jpg";

			File::delete(public_path('uploads/avatar/').@$agent -> avatar);

			Image::make($file->path())->save(public_path('uploads/avatar/').$avatar_path, 100, 'jpg');

			$agent -> avatar = $avatar_path;
		}

		$agent -> full_name= $req -> full_name;
		$agent -> description= $req -> about;
		$agent -> tel= $req -> tel;
		$agent -> email= $req -> email;
		$agent -> address= $req -> address;
		$agent -> telegram= $req -> telegram;

		C::store($agent);

		return redirect() -> route('agent') -> with('success', 'Данные успешно изменены!');
	}
}
