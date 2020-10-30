<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveSearchController extends Controller
{
    public function index()
    {
        return view('frontend.pages.liveSearch');
    }

    public function action(Request $request)
    {
        if ($request->ajax())
        {
            $query = $request->get('query');
            if ($query != '')
            {
             return   $data = DB::table('products')
                    ->where('name','like','%'.$query.'%')
                    ->orWhere('title','like','%'.$query.'%')
                    ->orWhere('description','like','%'.$query.'%')
                    ->get();

                //test
            }
            else
            {
                $data = DB::table('products')
                    ->orderBy('id','desc')
                    ->get();
            }

            $total_row = $data->count();
            if ($total_row > 0)
            {
                foreach ($data as $row)
                {
                    $output .= '
                    <tr>
                        <td>'.$row->name.'</td>
                        <td>'.$row->mrp_price.'</td>
                        <td>'.$row->description.'</td>
                    </tr>
                    ';
                }
            }
            else
            {
                $output = '<tr colspan="5">No Data Found</tr>>';
            }

            $data = array(
                'table_data'        =>      $output,
                'total_data'        =>      $total_row
            );

            echo json_encode($data);
        }
    }
}
