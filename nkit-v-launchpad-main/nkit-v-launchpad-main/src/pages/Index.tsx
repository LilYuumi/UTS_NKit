import { Button } from "@/components/ui/button";
import heroBg from "@/assets/hero-bg.jpg";
import gundam from "@/assets/gundam.png";
import { Shield, Zap, Lock, ChevronRight } from "lucide-react";

const Index = () => {
  return (
    <div className="min-h-screen bg-background text-foreground overflow-hidden relative">
      {/* Animated Grid Background */}
      <div className="absolute inset-0 grid-pattern opacity-30" />
      
      {/* Animated Corner Accents */}
      <div className="absolute top-0 left-0 w-32 h-32 border-t-2 border-l-2 border-primary/50 animate-glow-pulse" />
      <div className="absolute top-0 right-0 w-32 h-32 border-t-2 border-r-2 border-accent/50 animate-glow-pulse" />
      <div className="absolute bottom-0 left-0 w-32 h-32 border-b-2 border-l-2 border-accent/50 animate-glow-pulse" />
      <div className="absolute bottom-0 right-0 w-32 h-32 border-b-2 border-r-2 border-primary/50 animate-glow-pulse" />

      {/* Hero Section */}
      <div className="relative min-h-screen flex items-center overflow-hidden">
        {/* Background Image */}
        <div 
          className="absolute inset-0 bg-cover bg-center bg-no-repeat"
          style={{ backgroundImage: `url(${heroBg})` }}
        >
          <div className="absolute inset-0 bg-gradient-to-r from-background via-background/90 to-transparent" />
        </div>

        {/* Gundam Model with Animation */}
        <div className="absolute right-0 top-1/2 -translate-y-1/2 w-1/2 h-full hidden lg:block animate-float">
          <img 
            src={gundam} 
            alt="Gundam Robot" 
            className="w-full h-full object-contain object-right drop-shadow-2xl"
          />
          {/* Glow effect behind Gundam */}
          <div className="absolute inset-0 bg-gradient-radial from-primary/20 via-transparent to-transparent blur-3xl" />
        </div>

        {/* Content */}
        <div className="relative z-10 container mx-auto px-6 lg:px-12 animate-slide-in">
          <div className="max-w-3xl">
            {/* Branding with Glow */}
            <div className="mb-8">
              <div className="flex items-center gap-2 mb-4">
                <div className="h-px w-12 bg-gradient-to-r from-primary to-accent animate-glow-pulse" />
                <p className="text-accent font-orbitron text-sm md:text-base tracking-widest font-bold text-glow-accent">
                  /{"{"}NKIT-V{"}"}
                </p>
                <div className="h-px w-12 bg-gradient-to-r from-accent to-primary animate-glow-pulse" />
              </div>
              
              <h1 className="text-6xl md:text-7xl lg:text-9xl font-orbitron font-black text-foreground mb-6 leading-none text-glow">
                BUILD
                <br />
                <span className="text-transparent bg-clip-text bg-gradient-to-r from-primary via-accent to-primary">
                  YOUR SYSTEM
                </span>
              </h1>
              
              <div className="border-l-4 border-primary pl-6 mb-6">
                <p className="text-lg md:text-2xl text-muted-foreground max-w-2xl font-rajdhani font-semibold">
                  Powerful CRUD system with modern interface. 
                  <br />
                  <span className="text-accent">Manage your data efficiently</span> with NKit-V platform.
                </p>
              </div>

              {/* Tech Specs */}
              <div className="flex flex-wrap gap-4 mb-8">
                <div className="bg-card/50 backdrop-blur-sm border border-primary/30 px-4 py-2 rounded font-mono text-xs">
                  <span className="text-primary">●</span> SYSTEM_v1.0
                </div>
                <div className="bg-card/50 backdrop-blur-sm border border-accent/30 px-4 py-2 rounded font-mono text-xs">
                  <span className="text-accent">●</span> STATUS_ONLINE
                </div>
                <div className="bg-card/50 backdrop-blur-sm border border-primary/30 px-4 py-2 rounded font-mono text-xs">
                  <span className="text-primary">●</span> READY_TO_DEPLOY
                </div>
              </div>
            </div>

            {/* CTA Button with Enhanced Style */}
            <div className="flex gap-4">
              <Button 
                size="lg"
                className="bg-gradient-to-r from-primary to-accent hover:from-primary/90 hover:to-accent/90 text-primary-foreground px-10 py-7 text-xl font-orbitron font-bold transition-all hover:scale-105 box-glow group"
                onClick={() => window.location.href = 'index.php'}
              >
                GET STARTED
                <ChevronRight className="ml-2 group-hover:translate-x-1 transition-transform" />
              </Button>
            </div>
          </div>
        </div>

        {/* Animated Scan Lines */}
        <div className="absolute inset-0 pointer-events-none">
          <div className="absolute top-0 left-0 w-full h-0.5 bg-gradient-to-r from-transparent via-primary to-transparent animate-pulse" />
          <div className="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-transparent via-accent to-transparent animate-pulse" />
        </div>
      </div>

      {/* Feature Cards with Enhanced Design */}
      <div className="relative z-10 container mx-auto px-6 lg:px-12 pb-20 -mt-32">
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
          {/* Feature 1 - CREATE */}
          <div className="group bg-card/80 backdrop-blur-sm border-2 border-primary/30 rounded-lg p-8 hover:border-primary transition-all duration-300 hover:box-glow relative overflow-hidden">
            <div className="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-full blur-3xl group-hover:bg-primary/20 transition-all" />
            <div className="relative">
              <div className="flex items-center gap-3 mb-4">
                <div className="p-3 bg-primary/20 rounded-lg border border-primary/50">
                  <Zap className="w-6 h-6 text-primary" />
                </div>
                <h3 className="text-2xl font-orbitron font-bold text-foreground">CREATE</h3>
              </div>
              <ul className="space-y-3 text-muted-foreground font-rajdhani text-lg">
                <li className="flex items-center gap-2">
                  <div className="w-2 h-2 bg-primary rounded-full animate-pulse" />
                  Fast data entry system
                </li>
                <li className="flex items-center gap-2">
                  <div className="w-2 h-2 bg-primary rounded-full animate-pulse" />
                  Real-time validation
                </li>
                <li className="flex items-center gap-2">
                  <div className="w-2 h-2 bg-primary rounded-full animate-pulse" />
                  Instant feedback loop
                </li>
              </ul>
            </div>
          </div>

          {/* Feature 2 - MANAGE */}
          <div className="group bg-card/80 backdrop-blur-sm border-2 border-accent/30 rounded-lg p-8 hover:border-accent transition-all duration-300 hover:shadow-[0_0_30px_hsl(var(--accent)/0.3)] relative overflow-hidden">
            <div className="absolute top-0 right-0 w-32 h-32 bg-accent/10 rounded-full blur-3xl group-hover:bg-accent/20 transition-all" />
            <div className="relative">
              <div className="flex items-center gap-3 mb-4">
                <div className="p-3 bg-accent/20 rounded-lg border border-accent/50">
                  <Shield className="w-6 h-6 text-accent" />
                </div>
                <h3 className="text-2xl font-orbitron font-bold text-foreground">MANAGE</h3>
              </div>
              <ul className="space-y-3 text-muted-foreground font-rajdhani text-lg">
                <li className="flex items-center gap-2">
                  <div className="w-2 h-2 bg-accent rounded-full animate-pulse" />
                  Live data updates
                </li>
                <li className="flex items-center gap-2">
                  <div className="w-2 h-2 bg-accent rounded-full animate-pulse" />
                  Easy editing interface
                </li>
                <li className="flex items-center gap-2">
                  <div className="w-2 h-2 bg-accent rounded-full animate-pulse" />
                  Bulk operations support
                </li>
              </ul>
            </div>
          </div>

          {/* Feature 3 - CONTROL */}
          <div className="group bg-card/80 backdrop-blur-sm border-2 border-primary/30 rounded-lg p-8 hover:border-primary transition-all duration-300 hover:box-glow relative overflow-hidden">
            <div className="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-full blur-3xl group-hover:bg-primary/20 transition-all" />
            <div className="relative">
              <div className="flex items-center gap-3 mb-4">
                <div className="p-3 bg-primary/20 rounded-lg border border-primary/50">
                  <Lock className="w-6 h-6 text-primary" />
                </div>
                <h3 className="text-2xl font-orbitron font-bold text-foreground">CONTROL</h3>
              </div>
              <ul className="space-y-3 text-muted-foreground font-rajdhani text-lg">
                <li className="flex items-center gap-2">
                  <div className="w-2 h-2 bg-primary rounded-full animate-pulse" />
                  Secure access control
                </li>
                <li className="flex items-center gap-2">
                  <div className="w-2 h-2 bg-primary rounded-full animate-pulse" />
                  Data integrity check
                </li>
                <li className="flex items-center gap-2">
                  <div className="w-2 h-2 bg-primary rounded-full animate-pulse" />
                  Full system control
                </li>
              </ul>
            </div>
          </div>
        </div>

        {/* Bottom Tech Bar */}
        <div className="mt-12 border-t border-primary/20 pt-8">
          <div className="flex flex-wrap justify-between items-center gap-4 font-mono text-xs text-muted-foreground">
            <div className="flex items-center gap-2">
              <div className="w-2 h-2 bg-green-500 rounded-full animate-pulse" />
              <span>ALL SYSTEMS OPERATIONAL</span>
            </div>
            <div className="flex gap-6">
              <span>UPTIME: 99.9%</span>
              <span className="text-primary">|</span>
              <span>LATENCY: &lt;50ms</span>
              <span className="text-primary">|</span>
              <span>RESPONSE: OPTIMAL</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Index;
