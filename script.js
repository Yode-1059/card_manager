let sub = document.getElementsByClassName("sub");
let start = document.querySelector("#start");
let how = document.querySelector("#howto");
let cnt = 0;
console.log(how);
console.log(start);
for (let i = 0; i < sub.length; i++) {

    sub[i].addEventListener('mouseover', () => {
        sub[i].style.backgroundColor = "#000";
    })

    sub[i].addEventListener('mouseout', () => {
        sub[i].style.backgroundColor = "#FFF";
    })
}


start.addEventListener('click', () => {
    if (cnt == 0) {
        how.style.display = "block";
        how.style.opacity = "1";
        cnt = 1;
        setTimeout(() => {
        }, 500);
    }
    how.addEventListener('click', () => {
        if (cnt == 1) {
            how.style.display = "none";
            how.style.opacity = "0";
            cnt = 0;
        }
    })
})