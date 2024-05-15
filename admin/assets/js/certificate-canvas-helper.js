var webCertificateUrls = [
    '/main/assets/img/banner-certif/BGCertifA4/Sertifikat_A4_1.jpg',
    '/main/assets/img/banner-certif/BGCertifA4/Sertifikat_A4_2.jpg',
    '/main/assets/img/banner-certif/BGCertifA4/Sertifikat_A4_3.jpg',
    '/main/assets/img/banner-certif/BGCertifA4/Sertifikat_A4_4.jpg',
    '/main/assets/img/banner-certif/BGCertifA4/Sertifikat_A4_5.jpg',
    '/main/assets/img/banner-certif/BGCertifA4/Sertifikat_A4_6.jpg',
    '/main/assets/img/banner-certif/BGCertifA4/Sertifikat_A4_7.jpg',
    '/main/assets/img/banner-certif/BGCertifA4/Sertifikat_A4_8.jpg',
    '/main/assets/img/banner-certif/BGCertifA4/Sertifikat_A4_9.jpg',
];

var mobCertificateUrls = [
    '/main/assets/img/banner-certif/BGCertifMobile/Sertifikat_Mobile_1.jpg',
    '/main/assets/img/banner-certif/BGCertifMobile/Sertifikat_Mobile_2.jpg',
    '/main/assets/img/banner-certif/BGCertifMobile/Sertifikat_Mobile_3.jpg',
    '/main/assets/img/banner-certif/BGCertifMobile/Sertifikat_Mobile_4.jpg',
    '/main/assets/img/banner-certif/BGCertifMobile/Sertifikat_Mobile_5.jpg',
    '/main/assets/img/banner-certif/BGCertifMobile/Sertifikat_Mobile_6.jpg',
    '/main/assets/img/banner-certif/BGCertifMobile/Sertifikat_Mobile_7.jpg',
    '/main/assets/img/banner-certif/BGCertifMobile/Sertifikat_Mobile_8.jpg',
    '/main/assets/img/banner-certif/BGCertifMobile/Sertifikat_Mobile_9.jpg',
];

var randomTemplateIndex = 1; // Math.floor(Math.random() * webCertificateUrls.length);

var selectedTemplateWebUrl = webCertificateUrls[randomTemplateIndex];
var selectedTemplateMobUrl = mobCertificateUrls[randomTemplateIndex];

var background;
var background1 = new Image();
background1.src = selectedTemplateWebUrl;
var background2 = new Image();
background2.src = selectedTemplateMobUrl;

// if portrait
if(window.innerHeight > window.innerWidth) {
    background = background2;
}
// if landscape
else {
    background = background1;
}

// WEB FLAGS
var webCanvas = document.getElementById("webCertifCanvas");
var webCtx = webCanvas.getContext("2d");
var textColor = "#FFFFFF";

webCtx.font = '42pt "Black Han Sans"';
webCtx.font = 'bold 16pt "Montserrat"';
webCtx.font = '42pt "Black Han Sans"';

if (randomTemplateIndex == 0) {
    textColor = "#002448";
}

window.onresize = function(event) {
    if(window.innerHeight > window.innerWidth) {
        background = background2;
    }
    else {
        background = background1;
    }
};

function downloadWebCertif(element, username, tourn_name, tourn_creator, game_type, datetime) {
    // Portrait
    if(window.innerHeight > window.innerWidth){
        // selectedTemplateWebUrl = mobCertificateUrls[randomTemplateIndex];
        // background.src = selectedTemplateWebUrl;

        webCanvas.width = background.width;
        webCanvas.height = background.height;

        // Draw Background
        webCtx.clearRect(0,0,background.width, background.height);
        webCtx.drawImage(background, 0, 0);

        // Place username

        // HANDLE ERROR: Loop font size,
        // until we can get the measured textwidth < wevCanvas.width * 3/4
        webCtx.fillStyle = textColor;
        webCtx.font = '42pt "Black Han Sans"';
        var lineWidth = webCtx.measureText(username).width;
        webCtx.fillText(username, (webCanvas.width / 2) - (lineWidth / 2), (webCanvas.height / 2) - 81);

        // Place Info
        webCtx.font = 'bold 16pt "Montserrat"';
        var info = tourn_creator + " - " + tourn_name + " - " + game_type;
        var textWidth = webCtx.measureText(info).width;
        var maxWidth = webCtx.canvas.width * 7/8;
        var tempInfoHeight = 0;
        if (textWidth > maxWidth) {
            var lines = tokenizeLine(info, maxWidth, webCtx);
            for (var i = 0; i < lines.length; i++) {
                var lineWidth = webCtx.measureText(lines[i]).width;
                webCtx.fillText(lines[i], ((webCanvas.width / 2) - (lineWidth / 2)), (webCanvas.height / 2) + 36 + i*28);
                tempInfoHeight = i*28;
            }
            tempInfoHeight += 28;
        }
        else {
            webCtx.fillText(info, (webCanvas.width / 2) - (textWidth / 2), (webCanvas.height / 2) + 36);
        }

        // Place Gametype
        // game_type = " - " + game_type;
        // var lineWidth = webCtx.measureText(game_type).width;
        // webCtx.fillText(game_type, (webCanvas.width / 2) - (lineWidth / 2), (webCanvas.height / 2) + 36 + tempInfoHeight);

        // Place Date
        datetime = datetime.split(' ')[0];
        var lineWidth = webCtx.measureText(datetime).width;
        webCtx.fillText(datetime, (webCanvas.width / 2) - (lineWidth / 2) + 28, (webCanvas.height / 2) + 120);

        var dt = webCanvas.toDataURL('image/png');
        /* Change MIME type to trick the browser to downlaod the file instead of displaying it */
        dt = dt.replace(/^data:image\/[^;]*/, 'data:application/octet-stream');
    
        /* In addition to <a>'s "download" attribute, you can define HTTP-style headers */
        dt = dt.replace(/^data:application\/octet-stream/, 'data:application/octet-stream;headers=Content-Disposition%3A%20attachment%3B%20filename=Canvas.png');
    
        element.href = dt;
    }
    // Landscape
    else {
        // selectedTemplateWebUrl = webCertificateUrls[randomTemplateIndex];
        // background.src = selectedTemplateWebUrl;

        webCanvas.width = background.width;
        webCanvas.height = background.height;
    
        // Draw Background
        webCtx.clearRect(0,0,background.width, background.height);
        webCtx.drawImage(background, 0, 0);
    
        // Place username
        webCtx.fillStyle = textColor;
        webCtx.font = '58pt "Black Han Sans"';
        var lineWidth = webCtx.measureText(username).width;
        webCtx.fillText(username, (webCanvas.width / 2) - (lineWidth / 2), (webCanvas.height / 2) - 96);
    
        // Place Info
        webCtx.font = 'bold 24pt "Montserrat"';
        var info = tourn_creator + " - " + tourn_name + " - " + game_type;
        var lineWidth = webCtx.measureText(info).width;
        webCtx.fillText(info, (webCanvas.width / 2) - (lineWidth / 2), (webCanvas.height / 2) + 104);
    
        // Place Date
        datetime = datetime.split(' ')[0];
        var lineWidth = webCtx.measureText(datetime).width;
        webCtx.fillText(datetime, (webCanvas.width / 2) - (lineWidth / 2) + 10, (webCanvas.height / 2) + 161);
    
        var dt = webCanvas.toDataURL('image/png');
        /* Change MIME type to trick the browser to downlaod the file instead of displaying it */
        dt = dt.replace(/^data:image\/[^;]*/, 'data:application/octet-stream');
    
        /* In addition to <a>'s "download" attribute, you can define HTTP-style headers */
        dt = dt.replace(/^data:application\/octet-stream/, 'data:application/octet-stream;headers=Content-Disposition%3A%20attachment%3B%20filename=Canvas.png');
    
        element.href = dt;
    }
}

function tokenizeLine(text, maxWidth, ctx) {
    var words = text.split(" ");
    var currentLine = words[0];
    var tokens = [];

    for (var i = 1; i < words.length; i++) {
        var word = words[i];
        var width = ctx.measureText(currentLine + " " + word).width;
        if (width < maxWidth) {
            currentLine += " " + word;
            continue;
        } 
        tokens.push(currentLine);
        currentLine = word;
    }
    tokens.push(currentLine);
    return tokens;
}