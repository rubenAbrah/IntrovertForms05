<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forms</title>
    <style>
        wrapper { display: flex; justify-content: space-around; }
        form { display: flex; flex-direction: column;width: clamp(300px, 40vw, 900px);}
    </style>
</head>

<body>
    <?     
    require_once($_SERVER['DOCUMENT_ROOT'] . '/introvert_save.php');
    require_once(__DIR__ . '/Introvert/autoload.php');
    Introvert\Configuration::getDefaultConfiguration()->setHost('https://api.s1.yadrocrm.ru/tmp');
    Introvert\Configuration::getDefaultConfiguration()->setApiKey('key', '23bc075b710da43f0ffb50ff9e889aed');


    $api = new Introvert\ApiClient();

    try {
        $statuses = $api->account->statuses();
        $pipline_statuses = $statuses['result'];
        function sort_statuses($a, $b)
        {
            if ($a['sort'] > $b['sort']) {
                return 1;
            } elseif ($a['sort'] < $b['sort']) {
                return -1;
            }
            return 0;
        }
        usort($pipline_statuses, 'sort_statuses');

        $first_form_status =   $pipline_statuses[0]['id'];
        $second_form_status =  $pipline_statuses[1]['id'];
 
        $usersList = $api->yadro->getUsers();

        $firstForm_users = array_slice($usersList['result'], 0, 3);
        $secondForm_users = array_slice($usersList['result'], 3, 3);

        $first_form_users_ids = getIds($firstForm_users);
        $second_form_users_ids =  getIds($secondForm_users);

     
         
    } catch (Exception $e) {
        echo 'Exception when calling AccountApi->allStatuses: ', $e->getMessage(), PHP_EOL;
    }  







       getIds($secondForm_users);
        function getIds($userArr)
        { 
            $idsArr = array();
            foreach ($userArr as   $user) {
                $idsArr[] = $user['email'];
            }
            return implode(";", $idsArr);
        }


?>
 

    <wrapper>
        <section>
            <p>форма 1</p>
            <form action="#" method="post">
                <label for="name">Ваше имя</label>
                <input type="text" name="name" id="name">
                <label for="phone">Телефон</label>
                <input type="text" name="phone" id="phone">
                <label for="email">Почта</label>
                <input type="text" name="email" id="email">
                <label for="comment">Ваш комментарий</label>
                <textarea type="text" name="comment" id="comment"></textarea>
                <input type="hidden" name="status" value="<?= $first_form_status ?>" id="status">
                <input type="hidden" name="intr_group" value="<?= $first_form_users_ids ?>" id="intr_group">
                <button>создать контакт</button>
            </form>
        </section>
        <section>
            <p>форма 2</p>
            <form action="#" method="post">
                <label for="name">Ваше имя</label>
                <input type="text" name="name" id="name">
                <label for="phone">Телефон</label>
                <input type="text" name="phone" id="phone">
                <label for="email">Почта</label>
                <input type="text" name="email" id="email">
                <label for="comment">Ваш комментарий</label>
                <textarea type="text" name="comment" id="comment">  </textarea>
                <input type="hidden" name="status" value="<?= $second_form_status ?>" id="status">
                <input type="hidden" name="intr_group" value='"<?= $second_form_users_ids?>"' id="intr_group">
                <button>создать контакт</button>
            </form>
        </section>
    </wrapper> 
    
    

    <script type="text/javascript">
        (function(d, w, k) {
            w.introvert_callback = function() {
                try {
                    w.II = new IntrovertIntegration(k);
                } catch (e) {
                    console.log(e)
                }
            };

            var n = d.getElementsByTagName("script")[0],
                e = d.createElement("script");

            e.type = "text/javascript";
            e.async = true;
            e.src = "https://api.yadrocrm.ru/js/cache/" + k + ".js";
            n.parentNode.insertBefore(e, n);
        })(document, window, '3363f0c5');
    </script>
</body>

</html>
