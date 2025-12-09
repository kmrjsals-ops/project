  document.addEventListener('DOMContentLoaded', () => {
  // ---------- 아코디언 기능 (문의 내역) ----------
  const questionRows = document.querySelectorAll('.question');
  questionRows.forEach(row => {
    row.addEventListener('click', function() {
      const answerRow = this.nextElementSibling;
      const icon = this.querySelector('.fa-sort-down');

      if (answerRow && answerRow.classList.contains('answer')) {
        if (answerRow.style.display === 'table-row') {
          // 현재 열려 있다면 닫기
          answerRow.style.display = 'none';
          this.classList.remove('active');
          if (icon) icon.classList.remove('active');
        } else {
          // 현재 닫혀 있다면 열기
          answerRow.style.display = 'table-row';
          this.classList.add('active');
          if (icon) icon.classList.add('active');
        }
      }
    });
  });
});