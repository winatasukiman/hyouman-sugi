<?php
/**
 * Update this function when new game available.
 */
function ocr($game_id, $filepath){
    // MLBB
    if ($game_id == '1'){
        $url = 'https://ocr.varena.id:5000/mlbb_match';
        
        $filecontents = file_get_contents(base_url() + $filepath);
        $base64 = base64_encode($filecontents);

        $postdata = http_build_query(
            array(
                'var1' => 'TEST',
                'file' => $base64
            )
        );
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        
        var_dump($result);
        exit;

        // OCR all data.
        $output = json_decode($result);
        $output->{'image_url'} = $filepath;
    }
    // DOTA 2
    else if ($game_id == '7'){
        $command = 'python ./ocr_mlbb/tesseract_dota.py --image '.$filepath.' --opt 2';

        // OCR match id.
        $output = json_decode(shell_exec($command));

        // Request API with the MatchId
        // ... 

        $output->{'image_url'} = $filepath;
    }
    return $output;
}

/**
 * Update this function when new game available.
 */
function check_similarity($game_id, $user_game_data, $ocr_output, $similarity_threshold){
    $highest_accuracy = 0;
    $username_with_highest_acc = "";

    $username_db = $user_game_data->user_game_nickname;

    $submit_as = "";
    // MLBB
    if ($game_id == '1'){
        foreach($ocr_output->team_left as $player_name) {
            $sim1 = similar_text($player_name, $username_db, $acc1);
            $sim2 = similar_text($username_db, $player_name, $acc2);
    
            if ($acc1 > $similarity_threshold || $acc2 > $similarity_threshold) {
                if ($acc1 > $acc2) {
                    $highest_accuracy = $acc1;
                }
                else {
                    $highest_accuracy = $acc2;
                }
                
                $username_with_highest_acc = $player_name;
                $submit_as = $username_db;
                break;
            }
            if ($acc1 > $highest_accuracy || $acc2 > $highest_accuracy){
                $username_with_highest_acc = $player_name;
                if ($acc1 > $acc2) {
                    $highest_accuracy = $acc1;
                }
                else {
                    $highest_accuracy = $acc2;
                }
            }
        }
    }
    else if ($game_id == '7'){

    }

    if ($submit_as == "") {
        $submit_as = $username_with_highest_acc;
    }
    return array($submit_as, $highest_accuracy, $username_with_highest_acc);
}

function get_result_from_ocr($output, $game_id){
    if ($game_id == "1"){
        return get_mlbb_result($output);
    } 
    else if ($game_id == "7"){
        return get_dota2_rank($output);
    }
}

function get_mlbb_result($output) {
    if ($output->result == 'result_victory'){
        return "Win";
    } 
    return "Lose";
}

function get_dota2_rank($output) {
    $api_response = http_request(
        'https://api.steampowered.com/IDOTA2Match_570/GetMatchDetails/V001/?key=A2BB22C7606E43C64EB0DB5BF2DBCC2A&match_id='
        .$output->profile_id_64bit);
    
    print_r($api_response);
    exit;
}

/**
 * Update this function when new game available.
 */
function calculate_prizes($game_id, $tourn_reward_percentage, 
                        $tourn_min_token, $participants_count) {
    if ($game_id == '1' || $game_id == '7')
        return ($tourn_reward_percentage*0.01) * $tourn_min_token * $participants_count / 5;
    else {
        return null; // not yet implemented
    }
}

function http_request($url) {
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // mengembalikan hasil curl
    return $output;
}
?>