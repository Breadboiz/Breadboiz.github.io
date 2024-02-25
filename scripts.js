
const form = document.querySelector("form")

statusTxT = form.querySelector(".button-area span")

form.onsubmit = (e) =>{
    e.preventDefault()
    statusTxT.style.display = "block"
    statusTxT.style.color = "#0D6EFD"
    let xhr = new XMLHttpRequest()
    xhr.open('POST',"app.php", true)
    xhr.onload = () =>{
        if(xhr.readyState === 4 && xhr.status === 200){
            let response = xhr.responseText
            console.log(response)
            if(response.indexOf('Email and message field is required') != -1 || response.indexOf('Please enter a valid address' || response.indexOf('Sorry, failed to send your message!!!'))){
                statusTxT.style.color = "red"
            }
            else{
                form.reset()
                setTimeout(()=>{
                    statusTxT.style.display = "none"
                },3000)
            }
            statusTxT.innerText = response
        }
    }
    let formData = new FormData(form)
    xhr.send(formData)
}