<?php
/* Displays user information and some useful messages */
session_start();
include 'db.php';

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $submit = $_SESSION['submit'];

    //Pulls the data from SQL Server
    $data = $mysqli->query("SELECT * FROM accounts WHERE email='$email'");

    $user = $data->fetch_assoc();
  }

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="img/icon.png">
  <meta charset="UTF-8">
  <title>Welcome <?= $first_name.' '.$last_name ?></title>
  <?php include 'css/css.html'; ?>
</head>

<body>
  <div class="form">
          <h1>Application</h1>
          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?></p>

          <p>
            <?php
          echo $_SESSION['message'];
          ?>
        </p>

          <!-- Enter questions here -->
          <!-- Question Template -->
          <!--   <u>(Title)</u><br>
                  (Question)
                  <textarea type="(title)" name="(title)"><?php //echo $user['(title)']; ?></textarea>
                  <br>
          -->

          <form method="POST" action="save.php">
            <b><u> Basic Information</u></b><br><br>
            <!-- Question 1 -->
            氏名<span class="req">*</span><br>
            <textarea   autocomplete="off" style="height:40px" name="name"><?php echo $user['name']; ?></textarea>
            <br>
            <!-- Question 2 -->
            ふりがな<span class="req">*</span><br>
            <textarea   autocomplete="off" style="height:40px" name="furigana"><?php echo $user['furigana']; ?></textarea>
            <br>
            <!-- Question 3 -->
            性別<span class="req">*</span><br>
            <select  autocomplete="off" name="gender">
              <<option value="">Select One</option>
              <option value="M">男性</option>
              <option value="F">女性</option>
              <option value="O">その他</option>
            </select>
            <br><br>
            <!-- Question 4 -->
            生年月日 mm/dd/yyyy<span class="req">*</span><br>
            <textarea  autocomplete="off" style="height:40px" type="birthday" name="birthday" placeholder="mm/dd/yyyy"><?php echo $user['birthday']; ?></textarea>
            <br>
            <!-- Question 5 -->
            在籍/出身高等学校名（都道府県名）<span class="req">*</span><br>
            海外のハイスクール在籍/出身の方は国名をご記入ください。
            <textarea   autocomplete="off" style="height:40px" type="hs" name="hs"><?php echo $user['hs']; ?></textarea>
            <br>
            <!-- Question 6 -->
            現在の状況<span class="req">*</span><br>
            <select name="grade"  autocomplete="off">
              <<option value="">Select One</option>
              <option value="2">高校2年生</option>
              <option value="3">高校三年生</option>
              <option value="U">既卒生（大学生）</option>
              <option value="G">既卒生（ギャップターム生）</option>
            </select>
            <br><br>
            <!-- Question 7 -->
            既卒生（大学生）とお答えした方は在籍大学名を記入ください<br>
            <textarea style="height:40px" type="uni" name="uni" ><?php echo $user['uni']; ?></textarea>
            <br>
            <!-- Question 8 -->
            海外滞在経験（一年以上）<span class="req">*</span><br>
            一年以上の海外滞在経験がある場合は、滞在期間と国名を記入ください。ない場合「ない」と記入してください。
            <textarea  autocomplete="off" style="height:80px" type="abroad" name="abroad" placeholder="例: 2005-2010 アメリカ"><?php echo $user['abroad']; ?></textarea>
            <br>
            <!-- Question 9 -->
            留学フェローシップを知るに至ったきっかけを教えてください<br>
            <select name="how">
              <option value="RF">キャラバン・ミニキャンプなどの留フェロ事業で</option>
              <option value="FB">Facebook</option>
              <option value="Twitter">Twitter</option>
              <option value="Web">Web検索</option>
              <option value="Media">新聞や雑誌から</option>
              <option value="Friends">友人・知人から</option>
            </select>
            <br>
            <br>

            <b><u>Academic Achievement/Extracurricular Activities</u></b><br><br>
            <!-- Question 1 -->
            語学力を証明する試験名とそのスコア<span class="req">*</span><br>
            TOEFL, IELTS, SATなどを記入する場合は科目やセクションごとの点数を分けて記入してください。<br>
            複数可/同一試験の場合は最も高いスコアを記入してください<br>
            <textarea  autocomplete="off" style="height:40px" type="scores" name="scores"><?php echo $user['scores']; ?></textarea>
            <br>
            <!--Question 2 -->
            課外活動<span class="req">*</span><br>
            部活動、ボランティア、受賞歴等あなたが尽くした/している課外活動について記入してください。<br>
            複数まである場合は３つまで選び、活動事分けて記入してくさい。<br>
            <textarea  autocomplete="off" style="height:120px" type="ec" name="ec"><?php echo $user['ec']; ?></textarea>
            <br>
            <!--Question 3 -->
            志望大学<span class="req">*</span><br>
            志望大学を記入してください。<br>
            複数ある場合２つまで選んで記入してください<br>
            <textarea  autocomplete="off" style="height:80px" type="ds" name="ds"><?php echo $user['ds']; ?></textarea>
            <br>
            <b><u>Essays</u></b><br><br style="width: 25%">
            英語のエッセイ、日本語のエッセイ、短いエッセイ二つの計四つのエッセイを書いてください<br><br>
            <b><u> 2. English Essay<span class="req">*</span></b></u><br><br style="width: 25%">
            アメリカの大学を受ける際に書くCommon Applicationのエッセイの問題を一つ、もしくはイギリスの大学を受ける際に書くPersonal Statementを一つ書いてください(Max. 650 words)<br><br>
            <!--Question 1 -->
            English Essay Options<br><br>
            エッセイの題を選びご記入ください<br><br>
            1. Some students have a background, identity, interest, or talent that is so  meaningful they believe their application would be incomplete without it. If this sounds like you, then please share your story.<br><br>
            2. The lessons we take from failure can be fundamental to later success. Recount an incident or time when you experienced failure. How did it affect you and what did you learn from the experience<br><br>
            3. Reflect on a time when you challenged a belief or idea. What prompted you to act? Would you make the same decision again?<br><br>
            4. Describe a problem you'd like to solve. It can be an intellectual challenge, a research query, an ethical dilemma-anything that is of personal importance, nomatter the scale. Explain its significance to you and what steps you took or could be taken to identify a solution.<br><br>
            5. Discuss an accomplishment, event, or realization that sparked a period of personal growth and a new understanding of yourself or others.<br><br>
            6. Discribe a topic, idea, or concept you find so engaging that it makes you lose all track of time. Why does it captivate you? What or who do you turn to when you want to learn more?<br><br>
            7. Share an essay on any topic of your choice. It can be one you've already written, one that responds to a different prompt, or one of your own design.<br><br>
            8. Personal Statement (イギリスの大学を受ける際に必要となるエッセイ)<br><br>
            Essay prompt: <select  autocomplete="off" name="prompt">
              <<option value="">Select One</option>
              <option value="1">1.</option>
              <option value="2">2.</option>
              <option value="3">3.</option>
              <option value="4">4.</option>
              <option value="5">5.</option>
              <option value="6">6.</option>
              <option value="7">7.</option>
              <option value="8">8.</option>
            </select>
            <br><br>
            <textarea style="height:250px" type="ee" name="ee"><?php echo $user['ee']; ?></textarea>
            <br>
            <!--Question 2 -->
            Japanese Essay<span class="req">*</span><br>
            あなたが海外大学進学を1つの選択肢として考えている理由を教えてください。<br>
            650字程度。この問題は日本語で回答してください。<br>
            <textarea  autocomplete="off" style="height:250px" type="je" name="je"><?php echo $user['je']; ?></textarea>
            <br><br>
            <b><u>Short Answer Quetions</u></b><br><br style="width: 25%" >
            各250各字以下で日本語もしくは英語のどちらかで書いてください。必ず二つとも答えてください。なお、日本語でも英語でも、どちらかを優先することはありません。<br>
            <!--Question 3 -->
            Who or what is a source of inspiration for you and why?<span class="req">*</span><br>
            <textarea  autocomplete="off" style="height:150px" type="se1" name="se1"><?php echo $user['se1']; ?></textarea>
            <br>
            <!-- Question 4 -->
            Share a moment when you stepped out of your comfort zone and describe how it helped you grow into who you are today. <span class="req">*</span><br>
            <textarea  autocomplete="off" style="height:150px" type="se2" name="se2"><?php echo $user['se2']; ?></textarea>
            <br>
            <br>
            <b><u>Supplement</u></b><br>
            その他、以上のapplicationで自分の魅力を伝えきれなかったと感じ、他にアピールしたい強みがもしあれば、自由に表現したもの(音楽や写真、ダンスのポートフォリオ等)をメールで送ることのできるフォーマットにした上でapply@ryu-fellow.orgに送ってください。その際必ずファイル名を[firstname.lastname_supplement2016]とし、
            本文に氏名と添付ファイルについての簡潔な説明を記入してください。(締切:6/25 JST23:59)<br>
            <select name="supp">
              <option value="yes">提出する</option>
              <option value="no">提出しない</option>
            </select>
            <br>



            <!--button-->
            <br>
            <button name="save" class="button button-block" >Save</button>
            <br>
          </form>

          <input type="hidden" name="email" value="<? $email ?>">
          <input type="hidden" name="hash" value="<? $hash ?>">

          <a href="profile.php"><button class="button button-block" name="logout"/>Back</button></a>
          <br>
          <!-- logout button-->
          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
