const seed = document.getElementById('myStyles').getAttribute('href').split('?')[1];
const mt = new MersenneTwister(seed);
const rand = mt.int31();
function evaluateQuiz() {
    let scores = {};
    let subjects = [];
    const headers = document.getElementsByClassName('subject');
    for (let i = 0; i < headers.length; i++) {
        let subject = headers[i].getAttribute('id');
        let len = headers[i].getAttribute('len');
        subjects.push(subject);
        scores[subject] = {
            score: 0,
            max: Number(len)
        };
    }
    const questions = document.getElementsByClassName('question-container');
    for (let i = 0; i < questions.length; i++) {
        let flag = false;
        const options = questions[i].getElementsByClassName('option-radio');
		let hash = document.getElementById(options[0].getAttribute('name'));
        for (let j = 0; j < options.length; j++) {
            if ((options[j].checked) && (j === hash.getAttribute('value') - rand)) {
                let sub = hash.getAttribute('class');
                scores[sub].score++;
                flag = true;
                questions[i].style.backgroundColor = "#bfb";
            }
        }
        if (flag === false) {
            questions[i].style.backgroundColor = "#fcc";
        }
    }
    $("input[class=option-radio]").attr('disabled', true);
    $(".quiz-button").fadeOut();
    const scorecard = document.getElementById('scorecard');
    let scoreElement = "<h2 style='text-align: center'><span style='font-family:Damion'>Quizify</span><br><small>Score card</small></h2><br>" +
        "<table class='table table-striped table-hover table-responsive'>" +
        "<tr><th>Subject</th><th>Score</th></tr>";
    for (let i = 0; i < subjects.length; i++) {
        let subject = subjects[i];
        scoreElement += "<tr class='" + calculateTableRowClass(scores[subject]) + "'><td>" + subject + "</td><td>" + scores[subject].score + "/" + scores[subject].max + "</td></tr>";
    }
    scoreElement += "</table>";
    scorecard.innerHTML = scoreElement;
    $("#scorecard").fadeIn(2000);
}

function calculateTableRowClass(subjectScore) {
    score = subjectScore.score;
    max = subjectScore.max;
    if (score >= 0.8 * max) {
        return "success";
    }
    else if (score >= 0.5 * max) {
        return "info";
    }
    else if (score >= 0.25 * max) {
        return "warning";
    }
    else {
        return "danger";
    }
}
