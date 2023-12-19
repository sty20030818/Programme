function showProgram(part) {
    // 根据部分加载相应的页面
    if(part == 1||part == 2||part == 3){
        window.location.href = `program${part}.html`;
    }else if(part == 4){
        window.location.href = `program4_prepare.html`;
    }else if(part == 5){
        window.location.href = `program4_official.html`;
    }
}
