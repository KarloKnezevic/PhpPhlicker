<?php

namespace dispatcher;

interface Dispatcher {

    public function dispatch();

    //Would return Response
    //public function dispatch(Request $request);

}