<?php

function fileupload($file, $path)
{
    // $file = $request->file('image');
    $extenstion = $file->getClientOriginalExtension();
    $filename = time() . '.' . $extenstion;
    $file->move('projectFiles/' . $path . '/', $filename);
    // $student->image = $filename;
    return 'projectFiles/' . $path . '/' . $filename;
}


function total_add_to_cart_prodcut()
{
    $ids = collect(session()->get('product_ids'));
    return count($ids);
}
