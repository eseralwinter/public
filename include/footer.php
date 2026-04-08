    </main>
    <footer class="p-3 bg-dark text-light">
      <p> Корочки есть? Корочек нет!</p>
      <p> Есть демонстрационный экзамен. Готовимся...</p>
	  </footer>
    <script src="/assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script>
        // Пример скрипта JavaScript для отключения отправки формы при наличии недопустимых полей
        (() => {
          'use strict'

          // Извлекает все формы, к которым мы хотим применить пользовательские стили проверки Bootstrap
          const forms = document.querySelectorAll('.needs-validation')

          // Формирует цикл и предотвращает отправку
          Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }

              form.classList.add('was-validated')
            }, false)
          })
        })()
    </script>
  </body>
</html>
