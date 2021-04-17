<?php 
    function render_inputs($columns) {
        $res = '<tr class="table__row">';
        foreach ($columns as $cur) {
            $res = $res . '<td class="table__cell"><input type="text" name="' . $cur["input_name"] . '" class="input input_entry" placeholder="' . $cur["title"] . '" value="' . $_GET[$cur["input_name"]] . '"></td>';
        }
        $res = $res . '</tr>';
        echo $res;
    }

    function render_heads($columns) {
        $res = '<tr class="table__row">';
        foreach ($columns as $cur) {
            $res = $res . '<th class="table__cell table__cell_head">' . $cur["title"] . '</th>';
        }
        $res = $res . '</tr>';
        echo $res;
    }

    function render_rows($rows) {
        $res = "";
        foreach ($rows as $row) {
            $res = $res . '<tr class="table__row">';
            foreach ($row as $val) {
                $res = $res . '<td class="table__cell">' . $val . '</td>';
            }
            $res = $res . '</tr>';
        }
        echo $res;
    }
?>