<?php

namespace App\Filters;

use App\Models\EventModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class EventFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        //
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $eventModel = new EventModel();
        $events = $eventModel->getEvents();

        function dayDifferent ($date)  {
            $date = strtotime($date);
            $current_date = strtotime(date('Y-m-d'));
            $jarak = $date - $current_date;
            $hari = $jarak / 60 / 60 / 24;
            return $hari;
          };

        foreach($events as $event) {
            if(dayDifferent($event->date) < 0) {
                $event->is_completed = true;
                $eventModel->update($event->id, $event);
            }
        }
    }
}
