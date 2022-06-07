<?php
namespace App\Http\Controllers;

use App\Models\ContactForm;
use App\Services\CheckFormData;
use App\Services\CheckFormSearchData;
use App\Http\Requests\StoreContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //　ログイン後フォーム処理　　
    public function index(Request $request)
    {
        // 検索フォーム　DB絞り込み処理　{
        $formSearchData = $request->input('search');

        $query = DB::table('contact_forms');
        // 検索絞り込み前のデータ件数
        $countColumnQuery = $query->count();
        // CreateQuery関数の引数 $formSearchData　がnullの場合ExceptionErrorになるので if(isset())で対処
        if(isset($formSearchData)){
            $query = CheckFormSearchData::CreateQuery($formSearchData, $query);
            // dd($query);
        }
        $query->select('id', 'your_name','title','created_at');
        $query->orderby('created_at', 'asc');
        // 検索フォーム　DB絞り込み処理       }

        // 検索絞り込み後のデータ件数
        $countColumnQuery_after = $query->count();
        // dd($countColumnQuery);

        // 表示件数ページネイト　20件表示
        $contacts = $query->paginate(20);
        return view('contact.index', compact('contacts','countColumnQuery','countColumnQuery_after'));
        // 　　　　　　　　　              compact(viewに渡す変数)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     // データ新規登録
     public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // 登録データ保存
     public function store(StoreContactForm $request)
    {
        // モデル（DB）のインスタンス化
        $contact = new ContactForm;

        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');
        $contact->save();

        return redirect('contact/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // 登録データ確認表示
    public function show($id)
    {
        $contact = ContactForm::find($id);
        $gender = CheckFormData::checkGender($contact);
        $age = CheckFormData::checkAge($contact);
        return view('contact.show', compact('contact','gender','age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     // 登録データ編集
     public function edit($id)
    {
        $contact = ContactForm::find($id);
        return view('contact.edit', compact('contact'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // 登録データ更新
     public function update(Request $request, $id)
    {

        $contact = ContactForm::find($id);

        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');

        $contact->save();

        return redirect('contact/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // 登録データ削除
     public function destroy($id)
    {
        $contact = ContactForm::find($id);
        $contact->delete();

        return redirect('contact/index');
    }
}
