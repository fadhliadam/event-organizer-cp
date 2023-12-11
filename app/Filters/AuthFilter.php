<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
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
         $segments = service('uri')->getSegments();
         if (!session()->get('logged_in')) {
            if (in_array('superadmin', $segments)) {
                return redirect()->to(base_url('/superadmin/login'));
            }
            if (in_array('admin', $segments)) {
                return redirect()->to(base_url('/admin/login'));
            }
            if (!in_array('superadmin', $segments) || !in_array('admin', $segments)) {
                return redirect()->to(base_url('/login'));
            }
        } else {
            function check_for_routes($role_id) {
                $segments = service('uri')->getSegments();
                $check_has_role_id = [
                    1 => !in_array('superadmin', $segments),
                    2 => !in_array('admin', $segments),
                    3 => in_array('superadmin', $segments) || in_array('admin', $segments)
                ];
                $has_role_id = session()->get('role_id') == $role_id;
                return $has_role_id && $check_has_role_id[$role_id];
            }
            if (check_for_routes(1) ) {
                return redirect()->to(base_url('/superadmin/dashboard'));
            }
            if (check_for_routes(2)) {
                return redirect()->to(base_url('/admin/dashboard'));
            }
            if(check_for_routes(3)) {
                return redirect()->to(base_url('/dashboard'));
            }

            $isEventCollaborator = session()->get('is_event_collaborator');
            if (!$isEventCollaborator && in_array('events', $segments) && in_array('manage-events', $segments)) {
                return redirect()->to(base_url('/dashboard'));
            }
        }
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
        //
    }
}
