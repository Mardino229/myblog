<button class = "but"  data-clipboard-text="{{ url()->current() }}">Partagez <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                <path fill="#ffffff" d="M767.99994 585.142857q75.995429 0 129.462857 53.394286t53.394286 129.462857-53.394286 129.462857-129.462857 53.394286-129.462857-53.394286-53.394286-129.462857q0-6.875429 1.170286-19.456l-205.677714-102.838857q-52.589714 49.152-124.562286 49.152-75.995429 0-129.462857-53.394286t-53.394286-129.462857 53.394286-129.462857 129.462857-53.394286q71.972571 0 124.562286 49.152l205.677714-102.838857q-1.170286-12.580571-1.170286-19.456 0-75.995429 53.394286-129.462857t129.462857-53.394286 129.462857 53.394286 53.394286 129.462857-53.394286 129.462857-129.462857 53.394286q-71.972571 0-124.562286-49.152l-205.677714 102.838857q1.170286 12.580571 1.170286 19.456t-1.170286 19.456l205.677714 102.838857q52.589714-49.152 124.562286-49.152z">
                </path>
</svg></button>
<div id="alerteModal" class="modal">
    <p style = "
    padding: 3px;">Lien copié</p>
</div>
<script src="{{asset('assets/js/clipboard.min.js')}}"></script>
<script>

      new ClipboardJS('.but');
      document.querySelector('.but').addEventListener('click', function(event) {

        const modal = document.getElementById('alerteModal');
            modal.style.display = 'block';

            // Disparition automatique après 3 secondes
            setTimeout(function() {
                modal.style.display = 'none';
            }, 1000);
    
});

</script>