/* 
DEVELOPER BY: FRANCISCO GARCIA
DATE: 07-03-2021
*/

/* Animation Index - html */
gsap.to('.target',{
    rotationX: 360,
    duration: 2
})
/* PANELS */
let menuItems = document.querySelectorAll('#item')
let panels = document.querySelectorAll('#show_panel')
menuItems.forEach((items, index) => {
    items.addEventListener('click',(e)=>{
        e.preventDefault()
        show(panels,index)
    })
});

function show(section,item){
    section.forEach((element,index) => {
        if(index === item){
            element.classList.add('show')
            element.classList.remove('hide')
        }else{
            element.classList.add('hide')
            element.classList.remove('show')
        }
    });
}
/* Index - html */
let form = document.getElementById('formUser')
        form.addEventListener('submit', (e)=>{
            e.preventDefault();
            let name = document.getElementById('name').value
            let email = document.getElementById('email').value
            let message = document.getElementById('message').value
            let data = 'name='+name +'&email='+email+'&message='+message
            let url = 'php/main.php'
            let status = document.getElementById('result_status')
            //DEBUG
            //console.log('name ' + name)
            //console.log('email ' + email)
            //console.log('message ' + message)
            let httpx = new XMLHttpRequest()
            httpx.onreadystatechange = function(){
                if(httpx.readyState == 4 && httpx.status == 200){
                    console.log(httpx.responseText)
                    let response = httpx.responseText
                    if(response == 'success'){
                        status.innerHTML = `
                        <div class="target-success">
                            <h5>CREATE USER SUCCESS</h5>
                        </div>`
                    }else{
                        status.innerHTML = `
                        <div class="target-error">
                            <h5>ERROR IN CREATE USER</h5>
                        </div>`
                    }
                }
            }
            httpx.open('POST',url,true)
            httpx.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
            httpx.send(data) 
            
        })