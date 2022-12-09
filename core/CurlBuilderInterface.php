<?php

namespace core;

interface CurlBuilderInterface
{
    public function &setGetCurl(string $request_uri);
    public function &setPostCurl(string $request_uri, string $newUserInfo);
    public function &setDeleteCurl(string $request_uri);
    public function &setPutCurl(string $newRecordInfo, string $requested_uri);
}