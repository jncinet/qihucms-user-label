<?php

namespace Qihucms\UserLabel\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Qihucms\UserLabel\Resources\UserLabelCollection;

class LabelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * 读取用户标签
     *
     * @return \Illuminate\Http\JsonResponse|UserLabelCollection
     */
    public function userLabel()
    {
        if (method_exists(User::class, 'labels')) {
            $user = Auth::user();

            return new UserLabelCollection($user->labels);
        }

        return $this->jsonResponse([trans('user-label::message.configuration_error')], '', 422);
    }

    /**
     * 附加标签
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if (method_exists(User::class, 'labels')) {
            $user = Auth::user();

            $labels = $request->input('labels', []);

            if (is_array($labels) && count($labels) > 0) {
                $user->labels()->attach($labels);

                return $this->jsonResponse($labels);
            }

            return $this->jsonResponse([trans('user-label::message.invalid_parameter')], '', 422);
        }

        return $this->jsonResponse([trans('user-label::message.configuration_error')], '', 422);
    }

    /**
     * 分离标签
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        if (method_exists(User::class, 'labels')) {
            $user = Auth::user();

            $labels = $request->input('labels', []);

            if (is_array($labels) && count($labels) > 0) {
                $user->labels()->detach($labels);

                return $this->jsonResponse($labels);
            }

            return $this->jsonResponse([trans('user-label::message.invalid_parameter')], '', 422);
        }

        return $this->jsonResponse([trans('user-label::message.configuration_error')], '', 422);
    }
}