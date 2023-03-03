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
                <input type="hidden" name="status" value="42497374" id="status">
                <input type="hidden" name="intr_group" value="bbb@bb.ru; deemird2@yandex.ru; olgamooha2212@mail.com" id="intr_group">
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
                <input type="hidden" name="status" value="20715778" id="status">
                <input type="hidden" name="intr_group" value="testpers3@mail.ru; alphaprint30@gmail.com; group12@mail.ru" id="intr_group">
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
