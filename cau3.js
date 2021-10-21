const staff = [
    {
        id: 1,
        name: "Ba",
        birthday: "9/1/1985",
        dev: "Dev2",
    },
    {
        id: 4,
        name: "Hoàng",
        birthday: "12/1/1988",
        dev: "Dev2",
    },
    {
        id: 3,
        name: "Nguyen",
        birthday: "11/01/1987",
        dev: "Dev2",
    }
]
const isValidDate = (dateString) => {
    const maxDateInMonth = [31,29,31,30,31,30,31,31,30,31,30,31]
    if (dateString.match("([0-9]{2})/([0-9]{2})/([0-9]{4})")){
        let [month,date,year] = dateString.split("/");
        if ( month > 12 || month < 1) return false;
        if (date < 1 || date > maxDateInMonth[month-1]) return false;
        if (year < 0) return false;
        return true;
    }
    else
        return false;
}

var  stringErrorStaff = "List of staffs having invalid format birthday\n";
var needShow = 0;
staff.forEach((staff,key) => {
    if (isValidDate(staff.birthday) === false) {
        stringErrorStaff+= staff.name+"\n";
        needShow = 1;
    }
})
if (needShow = 1){
    alert(stringErrorStaff);
}