<?php
function cutText($postText, $maxCharacters = 300)
{
    $postText = htmlspecialchars($postText);
    if (strlen($postText) > $maxCharacters) {
        $words = explode(' ', $postText);
        $textLenth = 0;
        $newTextArray = [];

        foreach ($words as $word) {
            $textLenth += strlen($word);

            if ($textLenth <= $maxCharacters) {
                array_push($newTextArray, $word);
            } else {
                $newString = implode(' ', $newTextArray);
                $output = "<p>" . $newString . "...</p><a class='post-text__more-link' href='#'>Читать далее</a>";
                return $output;
            }
        }
    }
    $output = "<p>" . $postText . "</p>";
    return $output;
}

function renderTemplate($name, $data)
{
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}
