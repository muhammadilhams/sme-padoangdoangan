<script>
    // Function to toggle dropdown visibility
    function toggleDropdown() {
        document.getElementById('dropdownMenu').classList.toggle('hidden');
    }

    // Event listener for profile icon click
    // Event listener for profile icon click
    document.getElementById('profileDropdown').addEventListener('click', function(event) {
        console.log('Profile dropdown clicked');
        event.stopPropagation(); // Prevent event bubbling
        toggleDropdown();
    });


    // Event listener for document body click
    document.body.addEventListener('click', function() {
        // Hide dropdown if it's visible
        if (!document.getElementById('dropdownMenu').classList.contains('hidden')) {
            toggleDropdown();
        }
    });

    // Functionality for user modal
    const openModalLink = document.getElementById('openUserModal');
    const closeModalButton = document.getElementById('closeUserModal');
    const modal = document.getElementById('userModal');

    openModalLink.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'flex'; // Ensure modal is displayed as flex
        centerModal();
    });

    closeModalButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
    // Function to center the modal at the top of the screen
    function centerModal() {
        const topMargin = 20; // Adjust this value to set the distance from the top
        modal.style.paddingTop = `${topMargin}vh`; // Use vh (viewport height) to position the modal
    }

    // Recenter modal when the window is resized
    window.addEventListener('resize', centerModal);

    // Functionality for Edit modal
    const openEditModalLink = document.getElementById('openEditModal');
    const closeEditModalButton = document.getElementById('closeEditModal');
    const editModal = document.getElementById('editModal');

    openEditModalLink.addEventListener('click', function(event) {
        event.preventDefault();
        editModal.style.display = 'flex'; // Ensure modal is displayed as flex
        centerModal();
    });

    closeEditModalButton.addEventListener('click', function() {
        editModal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === editModal) {
            editModal.style.display = 'none';
        }
    });

    // Function to center the Edit modal at the top of the screen
    function centerEditModal() {
        const topEditMargin = 20; // Adjust this value to set the distance from the top
        editModal.style.paddingTop = `${topEditMargin}vh`; // Use vh (viewport height) to position the modal
    }

    // Recenter modal when the window is resized
    window.addEventListener('resize', centerEditModal);
    
</script>
