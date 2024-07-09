let rows = 7;
let m = 0;

for (let i = rows - 1; i >= 0; i--) {
    for (let j = m; j > 0; j--) {
        process.stdout.write(" ");
    }
    m++;

    for (let j = 0; j <= i; j++) {
        process.stdout.write("* ");
    }

    console.log();
}
