function solve(st,a,b) {
    let part1 = st.slice(0, a)
    let part2 = st.substring(a, b + 1);
    let exploded = part2.split('');
    let reversed = exploded.reverse();
    let reversedString = reversed.join('')
    let part3 = st.substring(b)
    return part1 + reversedString + part3
}

solve("developer",1,5)