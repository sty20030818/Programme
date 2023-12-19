function generateRandomNumber() {
    const classValue = document.getElementById('class').value;
    const nameValue = document.getElementById('name').value;
    const idValue = document.getElementById('id').value;

    // 使用 XMLHttpRequest 发送数据到后端 PHP 文件
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'save_info.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            displayRandomNumber(response.randomNumber);
        }
    };

    const data = {
        classValue: classValue,
        nameValue: nameValue,
        idValue: idValue
    };

    xhr.send(JSON.stringify(data));
}

function displayRandomNumber(randomNumber) {
    const randomNumberContainer = document.getElementById('random-number-container');
    randomNumberContainer.innerHTML = `<p>你的号码:${randomNumber}</p>`;
}
