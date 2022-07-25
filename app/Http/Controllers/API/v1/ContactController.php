<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function admin()
    {
        $contact = setting('admin.contact_admin');
        return response()->json($contact);
    }

    public function editData()
    {
        $contact = setting('admin.contact_edit_data');
        return response()->json($contact);
    }
}
