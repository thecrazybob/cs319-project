<?php

namespace Laravel\Nova\Http\Controllers;

use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\ActionRequest;
use Laravel\Nova\Http\Requests\NovaRequest;

class ActionController extends Controller
{
    /**
     * List the actions for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(NovaRequest $request)
    {
        $resourceId = with($request->input('resources'), function ($resourceIds) {
            return is_array($resourceIds) && count($resourceIds) === 1 ? $resourceIds[0] : null;
        });

        $resource = $request->newResourceWith(
            $request->findModel($resourceId) ?? $request->model()
        );

        return response()->json([
            'actions' => $this->availableActions($request, $resource),
            'pivotActions' => [
                'name' => $request->pivotName(),
                'actions' => $resource->availablePivotActions($request),
            ],
        ]);
    }

    /**
     * Perform an action on the specified resources.
     *
     * @param  \Laravel\Nova\Http\Requests\ActionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActionRequest $request)
    {
        $request->validateFields();

        return $request->action()->handleRequest($request);
    }

    /**
     * Get available actions for request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Laravel\Nova\Resource  $resource
     * @return \Laravel\Nova\Actions\ActionCollection<int, \Laravel\Nova\Actions\Action>
     */
    protected function availableActions(NovaRequest $request, $resource)
    {
        switch ($request->display) {
            case 'index':
                $method = 'availableActionsOnIndex';
                break;
            case 'detail':
                $method = 'availableActionsOnDetail';
                break;
            default:
                $method = 'availableActions';
        }

        return $resource->{$method}($request);
    }
}
