function solve(st, a, b) {
    let part1 = st.slice(0, a)
    let part2 = st.substring(a, b + 1);
    let reversedString = part2.split('').reverse().join('')
    let part3 = st.substring(b + 1)
    return part1 + reversedString + part3
}

solve("developer", 1, 5)