<?php

function utf8Encode($string)
{
    return preg_match('!!u', $string) ? $string : utf8_encode($string);
}


function resetRowCount($Data, $Index)
{
    for ($i = 0; $i < sizeof($Data); $i++) {
        $Data[$i][array_keys($Data[0])[$Index]] = $i + 1;
    }
    return $Data;
}

function buildTree($connection, $source)
{
    /**************
     * SAMPLE USE *
     **************

        $result = buildTree($connection, 1);
        $result = buildTree($connection, ["parent" => 1, "generations" => 5]); // Limit tree to 5 generations
     */
    $tree = [];
    $initial = func_num_args() === 2 ? true : false;
    $generation = $initial ? 2 : func_get_args()[2] + 1;
    $branch = null;
    if (is_array($source)) {
        if (($generation - 1) < $source["generations"] + 1) {
            $branch = Database::read($connection, "SELECT * FROM `app_person` WHERE `mother` = '{$source["parent"]}' OR `father` = '{$source["parent"]}'");
        }
    } else {
        $branch = Database::read($connection, "SELECT * FROM `app_person` WHERE `mother` = '$source' OR `father` = '$source'");
    }
    if ($branch) {
        foreach ($branch as $leaf) {
            $tree[] = array(
                "id" => $leaf["person_id"],
                "name" => $leaf["first_name"],
                "mother" => $leaf["mother"],
                "father" => $leaf["father"],
                "generation" => $generation,
                "children" => buildTree($connection, is_array($source) ? ["parent" => $leaf["person_id"], "generations" => $source["generations"]] : $leaf["person_id"], $generation),
            );
        }
    }
    if ($initial) {
        $totalAttributes = count($tree[0]) + 1; // Total attributes (e.g: id, name, etc.)
        $divider = $totalAttributes;
        return $tree ? array(
            "total" => (sizeof($tree, true) / $divider),
            "tree" => $tree
        ) : false;
    } else {
        return $tree ? $tree : false;
    }
}
