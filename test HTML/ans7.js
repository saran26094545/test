function Calculate(days) {

  const waterVolume = 5832;

  const dailyUsage = waterVolume / 3;

  let remainingWater = waterVolume;
  for (let i = 0; i < days; i++) {
    remainingWater -= dailyUsage;
  }

  return remainingWater;
}


const days = 1;
const remainingWater = Calculate(days);
console.log(`หลังจากใช้งาน ${days} วัน น้ำที่เหลืออยู่ในถังมี ${remainingWater.toFixed(2)} ลิตร`);
