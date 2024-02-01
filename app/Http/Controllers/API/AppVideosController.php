<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppVideos;
use App\Models\AppMonths;
use App\Models\AppNewskillActions;

class AppVideosController extends Controller
{
    public function index() {
        return AppVideos::all();
    }
    
    public function dashboard( $app_type ) {
        $getAllMonths = AppMonths::all();
        if ( ! empty( $getAllMonths ) ) {
            $current_date = date('Y-m-d H:i:s');
            foreach ( $getAllMonths as $month ) {
                $month_id         = $month->id;
                $month_lable      = $month->title_en;
                $month_pdf        = $month->month_pdf_link;
                $app_video        = AppVideos::where('month_id','=', $month_id )->where( 'app_type', '=', $app_type )->get();
                $total_videos     = $app_video->count();
                $play_video       = AppNewskillActions::WhereIn( 'video_play_status', array( 1, 2 ) )
                ->where( 'month_id', '=', $month_id )
                ->where( 'user_id', '=', 13 )
                ->orderBy('updated_at', 'desc' )->get();
                $total_play_video     = $play_video->count();
                $tap_status           = 1;
                if ( $total_play_video ) {
                    $last_activity = $play_video->first()->updated_at;;
                } else {
                    $last_activity  = $current_date;
                }

                $data[] = array(
                    'total_videos'   => $total_videos,
                    'month'          => $month_id,
                    'label'          => $month_lable,
                    'month_pdf_link' => $month_pdf,
                    'play_video'     => (int) $total_play_video,
                    'last_activity'  => $last_activity,
                    'tap_status'     => $tap_status,
                    'videodata'      => $app_video
                );
            }

            $response = array (
                'user_id'         => 13,
				'current_month'   => 12,
				'data'            => $data,
				'status'          => 200,
				'video_url'       => 'https://player.vimeo.com/video/569967825',
				'video_thumbnail' => 'http://www.possibletraining.com/wp-content/uploads/2021/07/thumbnail_skill_mat.png',
				'pdf_link'        => 'https://possibletraining.com/wp-content/uploads/2022/11/In-Season-Essentials-Calendar.pdf'
            );

        } else {
            $response['data'] = $return;
            $response['status'] = 200;
            $response['message'] = 'no';

        }

        return response( $response, 200 );
        
       }
}
