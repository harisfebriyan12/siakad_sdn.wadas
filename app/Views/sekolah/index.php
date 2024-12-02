<div class="container my-4">
    <h3 class="text-center">Struktur Sekolah</h3>
    <div class="tree">
        <?= buildTreeHtml($struktur) ?>
    </div>
</div>

<?php
function buildTreeHtml($tree)
{
    $html = '<ul>';
    foreach ($tree as $node) {
        $html .= '<li>';
        $html .= '<div class="node">';
        $html .= '<strong>' . esc($node['nama']) . '</strong><br>';
        $html .= esc($node['jabatan']) . '<br>';
        $html .= '<small>' . esc($node['kontak']) . '</small>';
        $html .= '</div>';
        if (!empty($node['children'])) {
            $html .= buildTreeHtml($node['children']);
        }
        $html .= '</li>';
    }
    $html .= '</ul>';
    return $html;
}
?>
<style>
    .tree ul {
    padding-left: 0;
    list-style: none;
    position: relative;
    padding-top: 20px;
}

.tree ul ul::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    border-left: 2px solid #ccc;
    width: 0;
    height: 20px;
}

.tree li {
    position: relative;
    padding-left: 20px;
    padding-right: 20px;
    text-align: center;
}

.tree li::before,
.tree li::after {
    content: '';
    position: absolute;
    top: 0;
    width: 50%;
    height: 20px;
    border-top: 2px solid #ccc;
}

.tree li::before {
    left: 50%;
    border-right: 2px solid #ccc;
}

.tree li::after {
    right: 50%;
    border-left: 2px solid #ccc;
}

.tree li:only-child::before,
.tree li:only-child::after {
    display: none;
}

.tree li:only-child {
    padding-top: 0;
}

.tree .node {
    display: inline-block;
    padding: 10px 15px;
    border: 2px solid #007bff;
    border-radius: 5px;
    background-color: #fff;
    position: relative;
}
</style>