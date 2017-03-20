<?php
namespace App\Api\V1;
use App\Commons\Response\ResponseJson;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;

/**
 * Created by PhpStorm.
 * User: Felix
 * Email: felix@1201.us
 * Date: 2017/3/17
 * Time: 15:19
 */
class BaseController extends Controller
{
    use ResponseJson ,Helpers;

    protected $guard = 'api';

}