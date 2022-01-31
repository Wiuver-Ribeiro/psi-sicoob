const activeTab = (e) => {
  const tabs = document.querySelector('.tab1');

  if(e == "dashboard") {
    tabs.classList.toggle('active');
    // alet(e);
  }
}
