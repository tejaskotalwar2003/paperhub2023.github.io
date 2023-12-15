console.log("Script running...")
document.querySelector('.cross').style.display = 'none';
document.querySelector('.cross').addEventListener("click", ()={
  document.querySelector('.hamburger').addEventListener.toggle('sidebarGo');
  if(document.querySelector('.sidebar').classList.contains('sidebarGo')){
  document.querySelector('.ham').style.display = 'inline'
  document.querySelector('.cross').style.display = 'none'
}
else{
  document.querySelector('.ham').style.display = 'none'
  setTimeout(() => {
    document.querySelector('.cross').style.display = 'inline'
    }, 300);
  }
})
