<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\NewsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class TypeOfNewsController extends Controller
{
    private $newsType;
    public function __construct(NewsType $newsType)
    {
        $this->newsType=$newsType;

        $this->middleware(['auth:admin', 'role:admin|staff|super admin']);

        $this->middleware('permission:create news_type|edit news_type');

        $this->middleware('permission:create news_type', ['only' => ['create', 'store']]);

        $this->middleware('permission:edit news_type', ['only' => ['edit', 'update']]);
    }

    public function index(){
        $newsTypes = $this->newsType->paginate(5);
        return view('admin.content.typeOfNews.index', compact('newsTypes'));
    }

    public function create(){
        return view('admin.content.typeOfNews.add');
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();
            $request->validate([
                'name' => 'required|max:50',
                'price' => 'required|numeric'
            ]);
            $this->newsType->create([
                'name' => $request->name,
                'gia' => $request->price,
            ]);
            DB::commit();
            session()->flash('success', 'Bạn đã thêm thành công.');
            return redirect()->route('admin.typeOfNews.index');
        }
        catch(Exception $exception){
            DB::rollBack();
        }
    }

    public function edit(NewsType $newsType){
        return view('admin.content.typeOfNews.edit', compact('newsType'));
    }

    public function update(Request $request, NewsType $newsType){
        try {
            $request->validate([
                'name' => 'required|max:50',
                'price' => 'required|numeric'
            ]);
            DB::beginTransaction();
            $this->newsType->find($newsType->id)->update([
                'name' => $request->name,
                'gia' => $request->price,
            ]);
            DB::commit();
            session()->flash('success', 'Bạn đã sửa thành công.');
            return redirect()->route('admin.typeOfNews.index');
        }
        catch(Exception $exception){
            DB::rollBack();
        }
    }
}
