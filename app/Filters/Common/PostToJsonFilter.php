<?php

namespace App\Filters\Common;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class PostToJsonFilter implements FilterInterface
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
        // Verifica si la solicitud es de tipo x-www-form-urlencoded
        if ($request->getMethod() === 'post' && $request->hasHeader('Content-Type') && $request->getHeader('Content-Type')->getValue() === 'application/x-www-form-urlencoded') {
            // Obtiene los datos del formulario POST
            $data = $request->getPost();

            // Convierte los datos en formato JSON
            $jsonData = json_encode($data);

            // Crea una nueva solicitud con los datos en formato JSON
            $newRequest = $request->setHeader('Content-Type', 'application/json')
                                   ->setBody($jsonData);
            
            return $newRequest;
        }

        return $request;
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
