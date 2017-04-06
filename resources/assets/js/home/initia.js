//科技等级和各级别大件个数上限
export var technologyInitia = {}

let technologies = ["AP", "APCR", "APDS", "HE", "RP", "HEAT", "HESH", "标准防护", "重装防护", "轻薄防护", "综合车体", "综合引擎"];
technologies.forEach((v)=>{
    technologyInitia[v]={
        name: v,
        lv1: 0,
        get1: 0,
        lv2: 0,
        get2: 0,
        lv3: 0,
        get3: 0,
    }
});

