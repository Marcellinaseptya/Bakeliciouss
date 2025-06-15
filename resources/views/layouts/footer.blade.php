<style>
    .image-cards {
  display: flex;
  justify-content: center;
  gap: 20px;
}

.image-cards img {
  width: 150px;
  height: 150px;
  border: 5px solid #f5e7dc;
  border-radius: 12px;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.image-cards img:hover {
  transform: scale(1.05);
}

.footer {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  background-color: #f3e4d2;
  padding: 40px 60px;
  flex-wrap: wrap;
  font-family: sans-serif;
}

/* Bagian Hubungi Kami */
.contact-info {
  width: 40%;
  text-align: left;
}

.contact-info h2 {
  font-size: 1.5rem;
  font-weight: bold;
  margin-bottom: 10px;
  color: #2d2d2d;
}

.contact-info p {
  color: #333;
  margin-bottom: 5px;
}

/* Bagian Customer Service */
.customer-service {
  width: 50%;
  text-align: right;
}

.customer-service h3 {
  font-size: 1.2rem;
  margin-bottom: 20px;
  color: #2d2d2d;
}

.customer-service .icons {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  gap: 50px;
  flex-wrap: wrap;
}

.customer-service .item {
  display: flex;
  flex-direction: column;
  align-items: center;
  font-size: 0.95rem;
  color: #2d2d2d;
}

.customer-service .item img {
  width: 30px;
  height: 30px;
  margin-bottom: 5px;
}

</style>

<footer class="footer">
  <section class="contact-info">
    <h2>Hubungi Kami</h2>
    <p>📍 Sidoarjo</p>
    <p>📞 0812-3456-7890</p>
    <p>📧 bakelicious@example.com</p>
  </section>

  <section class="customer-service">
    <div class="icons">
      <div class="item">
        <img src="/img/ig.png" alt="Instagram">
        <p>@bakelicious.id</p>
      </div>
      <div class="item">
        <img src="/img/tt.png" alt="YouTube">
        <p>bakelicious.id</p>
      </div>
      <div class="item">
        <img src="/img/email.png" alt="Email">
        <p>bakelicious@gmail.com</p>
      </div>
    </div>
  </section>
</footer>


  <!-- Footer -->
  <footer class="bg-[#3e2723] text-white text-center py-4">
    <p>&copy; 2025 BakeLicious. All rights reserved.</p>
  </footer>