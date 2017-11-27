

function Population() {
  // Array of rockets
  this.rockets = [];
  this.average;
  var solution=false;
  var path;
  var total=0;
  // Amount of rockets
   // this.popsize = 10;
  // Amount parent rocket partners
  //this.matingpool = [];

  // Associates a rocket to an array index
  for (var i = 0; i < popSize; i++) {
    this.rockets[i] = new Rocket();
  }

  this.evaluate = function() {
	average=0;
	total=0;
	solution=false;
	for(var i=0;i<this.rockets.length;i++){
		if(this.rockets[i].completed){
			solution=true;
			path=this.rockets[i].dna;
		}
	}
	if(solution){
		for(var i=0; i<this.rockets.length;i++){
			this.rockets[i]=new Rocket(path);
		}
	}
	else{
    var maxfit = 0;
    // Iterate through all rockets and calcultes their fitness
    for (var i = 0; i < popSize; i++) {
      // Calculates fitness
      this.rockets[i].calcFitness();
      // If current fitness is greater than max, then make max eqaul to current
      if (this.rockets[i].fitness > maxfit) {
        maxfit = this.rockets[i].fitness;
      }
    }
    // Normalises fitnesses
    for (var i = 0; i < popSize; i++) {
      this.rockets[i].fitness /= maxfit;
    }
	for(var i = 0; i < popSize; i++){
		total+=this.rockets[i].fitness;
	}
	average=total/popSize;
	console.log(average);
	

   /* this.matingpool = [];
    // Take rockets fitness make in to scale of 1 to 100
    // A rocket with high fitness will highly likely will be in the mating pool
    for (var i = 0; i < popSize; i++) {
      var n = this.rockets[i].fitness * 100;
      for (var j = 0; j < n; j++) {
        this.matingpool.push(this.rockets[i]);
			}	
		}*/
	}
  }
  // Selects appropriate genes for child
  this.selection = function() {
	if(!solution){
    var newRockets = [];
	var parentA;
	var parnetB;
	var child;
	var checked=false;
    for (var i = 0; i < this.rockets.length; i++) {
		    for (var j = 0; j < this.rockets.length; j++){
				if(random()<this.rockets[j].fitness){
					parentA=this.rockets[j].dna;
					break;
					}
			}
			for (var j = 0; j < this.rockets.length; j++){
				if(random()<this.rockets[j].fitness){
					parentB=this.rockets[j].dna;
					break;
					}
				
			}
		child = parentA.crossover(parentB);
		child.mutation(average);
		
      // Picks random dna
      //var parentA = random(this.matingpool).dna;
      //var parentB = random(this.matingpool).dna;
      // Creates child by using crossover function
      // Creates new rocket with child dna
		newRockets[i] = new Rocket(child);
    }
    // This instance of rockets are the new rockets
    this.rockets = newRockets;
	}
  }
  // Calls for update and show functions
  this.run = function(array) {
    for (var i = 0; i < popSize; i++) {
      this.rockets[i].update(array);
      // Displays rockets to screen
      this.rockets[i].show();
			}
		}
}

