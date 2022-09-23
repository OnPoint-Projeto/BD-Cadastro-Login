
const FloatLabel = (() => {
  
  // adicionar classe .active
  const handleFocus = (e) => { //focus: input ativo
    const target = e.target;
    target.parentNode.classList.add('active');
  };

  // remover classe .active
  const handleBlur = (e) => { //blur: "sair" do input
    const target = e.target;
    if(!target.value) {
      target.parentNode.classList.remove('active');
    }
  };
  
  // registrar eventos
  const bindEvents = (element) => {
    const floatField = element.querySelector('input');
    floatField.addEventListener('focus', handleFocus);
    floatField.addEventListener('blur', handleBlur);    
  };
  
  // aplicar aos elementos do DOM
  const init = () => {
    const floatContainers = document.querySelectorAll('.float');

    floatContainers.forEach((element) => {

      if (element.querySelector('input').value) {
        element.classList.add('active');
      }

      bindEvents(element);
    });
  };
  
  return {
    init: init
  };
})();

FloatLabel.init();