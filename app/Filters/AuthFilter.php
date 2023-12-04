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
            if (in_array('user', $segments)) {
                return redirect()->to(base_url('/login'));
            }
        } else {
            $data = [
                'title' => 'Dashboard'
            ];
            if (session()->get('role_id') == 1) {
                return view('pages/superadmin/dashboard', $data);
            }
            if (session()->get('role_id') == 2) {
                return view('pages/admin/dashboard', $data);
            }
            return view('pages/user/dashboard', $data);
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
