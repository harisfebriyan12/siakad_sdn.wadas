<?php

namespace App\Controllers;

use App\Models\StrukturSekolahModel;

class StrukturSekolahController extends BaseController
{
    protected $strukturModel;

    public function __construct()
    {
        $this->strukturModel = new StrukturSekolahModel();
    }

    public function index()
    {
        $data['struktur_sekolah'] = $this->buildTree($this->strukturModel->getStruktur());
        return view('sekolah/index', $data);
    }

    private function buildTree($elements, $parentId = NULL)
    {
        $branch = [];
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }
}
