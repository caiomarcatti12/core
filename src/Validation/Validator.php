<?php
//
//namespace CaioMarcatti12\Core\Validation;
//
//class Validator {
//    public static function valid($data, $rules): bool {
//        $validator = new Validator;
//
//        $validation = $validator->make($_POST + $_FILES, [
//            'name'                  => 'required',
//            'email'                 => 'required|email',
//            'password'              => 'required|min:6',
//            'confirm_password'      => 'required|same:password',
//            'avatar'                => 'required|uploaded_file:0,500K,png,jpeg',
//            'skills'                => 'array',
//            'skills.*.id'           => 'required|numeric',
//            'skills.*.percentage'   => 'required|numeric'
//        ]);
//    }
//}