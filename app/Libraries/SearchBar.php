<?php 

namespace App\Libraries;

class SearchBar {
    public function show($data) {
        return view('components/user/search_bar', $data);
    }
}
?>