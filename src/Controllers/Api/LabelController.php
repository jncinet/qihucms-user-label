<?php

namespace Qihucms\UserLabel\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Qihucms\UserLabel\Resources\UserLabelCollection;

class LabelController extends ApiController
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
            $user = \Auth::user();

            return new UserLabelCollection($user->labels);
        }

        return $this->jsonResponse(['配置错误'], '', 422);
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
            $user = \Auth::user();

            $labels = $request->input('labels', []);

            if (is_array($labels) && count($labels) > 0) {
                $user->labels()->attach($labels);

                return $this->jsonResponse($labels);
            }

            return $this->jsonResponse(['参数错误'], '', 422);
        }

        return $this->jsonResponse(['配置错误'], '', 422);
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
            $user = \Auth::user();

            $labels = $request->input('labels', []);

            if (is_array($labels) && count($labels) > 0) {
                $user->labels()->detach($labels);

                return $this->jsonResponse($labels);
            }

            return $this->jsonResponse(['参数错误'], '', 422);
        }

        return $this->jsonResponse(['配置错误'], '', 422);
    }
}