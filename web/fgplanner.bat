@echo off
"C:\Program Files\Java\jdk1.8.0_161\bin\java.exe" "-javaagent:C:\Program Files\JetBrains\IntelliJ IDEA 2018.1.3\lib\idea_rt.jar=56591:C:\Program Files\JetBrains\IntelliJ IDEA 2018.1.3\bin" -Dfile.encoding=UTF-8 -classpath "C:\Program Files\Java\jdk1.8.0_161\jre\lib\charsets.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\deploy.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\ext\access-bridge-64.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\ext\cldrdata.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\ext\dnsns.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\ext\jaccess.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\ext\jfxrt.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\ext\localedata.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\ext\nashorn.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\ext\sunec.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\ext\sunjce_provider.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\ext\sunmscapi.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\ext\sunpkcs11.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\ext\zipfs.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\javaws.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\jce.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\jfr.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\jfxswt.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\jsse.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\management-agent.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\plugin.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\resources.jar;C:\Program Files\Java\jdk1.8.0_161\jre\lib\rt.jar;C:\Users\Arafeh\Desktop\optaplanner\examples\fgplanner\target\classes;C:\Users\Arafeh\.m2\repository\com\google\code\gson\gson\2.8.1\gson-2.8.1.jar;C:\Users\Arafeh\.m2\repository\jfree\jfreechart\1.0.13\jfreechart-1.0.13.jar;C:\Users\Arafeh\.m2\repository\jfree\jcommon\1.0.16\jcommon-1.0.16.jar;C:\Users\Arafeh\.m2\repository\org\optaplanner\optaplanner-core\7.31.0.Final\optaplanner-core-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\kie\kie-internal\7.31.0.Final\kie-internal-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\drools\drools-core\7.31.0.Final\drools-core-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\kie\soup\kie-soup-commons\7.31.0.Final\kie-soup-commons-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\drools\drools-core-dynamic\7.31.0.Final\drools-core-dynamic-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\kie\soup\kie-soup-project-datamodel-commons\7.31.0.Final\kie-soup-project-datamodel-commons-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\kie\soup\kie-soup-project-datamodel-api\7.31.0.Final\kie-soup-project-datamodel-api-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\drools\drools-compiler\7.31.0.Final\drools-compiler-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\antlr\antlr-runtime\3.5.2\antlr-runtime-3.5.2.jar;C:\Users\Arafeh\.m2\repository\org\eclipse\jdt\core\compiler\ecj\4.6.1\ecj-4.6.1.jar;C:\Users\Arafeh\.m2\repository\com\google\protobuf\protobuf-java\3.6.1\protobuf-java-3.6.1.jar;C:\Users\Arafeh\.m2\repository\org\apache\commons\commons-math3\3.4.1\commons-math3-3.4.1.jar;C:\Users\Arafeh\.m2\repository\org\reflections\reflections\0.9.11\reflections-0.9.11.jar;C:\Users\Arafeh\.m2\repository\com\google\guava\guava\25.0-jre\guava-25.0-jre.jar;C:\Users\Arafeh\.m2\repository\com\google\code\findbugs\jsr305\1.3.9\jsr305-1.3.9.jar;C:\Users\Arafeh\.m2\repository\org\checkerframework\checker-compat-qual\2.0.0\checker-compat-qual-2.0.0.jar;C:\Users\Arafeh\.m2\repository\com\google\errorprone\error_prone_annotations\2.1.3\error_prone_annotations-2.1.3.jar;C:\Users\Arafeh\.m2\repository\com\google\j2objc\j2objc-annotations\1.1\j2objc-annotations-1.1.jar;C:\Users\Arafeh\.m2\repository\org\codehaus\mojo\animal-sniffer-annotations\1.14\animal-sniffer-annotations-1.14.jar;C:\Users\Arafeh\.m2\repository\org\javassist\javassist\3.22.0-GA\javassist-3.22.0-GA.jar;C:\Users\Arafeh\.m2\repository\org\optaplanner\optaplanner-persistence-common\7.31.0.Final\optaplanner-persistence-common-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\optaplanner\optaplanner-persistence-xstream\7.31.0.Final\optaplanner-persistence-xstream-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\optaplanner\optaplanner-persistence-jaxb\7.31.0.Final\optaplanner-persistence-jaxb-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\jboss\spec\javax\xml\bind\jboss-jaxb-api_2.3_spec\1.0.1.Final\jboss-jaxb-api_2.3_spec-1.0.1.Final.jar;C:\Users\Arafeh\.m2\repository\com\sun\xml\bind\jaxb-core\2.3.0\jaxb-core-2.3.0.jar;C:\Users\Arafeh\.m2\repository\com\sun\xml\bind\jaxb-impl\2.3.0\jaxb-impl-2.3.0.jar;C:\Users\Arafeh\.m2\repository\javax\activation\activation\1.1.1\activation-1.1.1.jar;C:\Users\Arafeh\.m2\repository\org\optaplanner\optaplanner-persistence-jackson\7.31.0.Final\optaplanner-persistence-jackson-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\com\fasterxml\jackson\core\jackson-core\2.9.9\jackson-core-2.9.9.jar;C:\Users\Arafeh\.m2\repository\com\fasterxml\jackson\core\jackson-databind\2.9.10.1\jackson-databind-2.9.10.1.jar;C:\Users\Arafeh\.m2\repository\com\fasterxml\jackson\core\jackson-annotations\2.9.9\jackson-annotations-2.9.9.jar;C:\Users\Arafeh\.m2\repository\org\optaplanner\optaplanner-benchmark\7.31.0.Final\optaplanner-benchmark-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\freemarker\freemarker\2.3.28\freemarker-2.3.28.jar;C:\Users\Arafeh\.m2\repository\org\kie\kie-api\7.31.0.Final\kie-api-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\kie\soup\kie-soup-maven-support\7.31.0.Final\kie-soup-maven-support-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\drools\drools-decisiontables\7.31.0.Final\drools-decisiontables-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\drools\drools-templates\7.31.0.Final\drools-templates-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\javax\xml\stream\stax-api\1.0-2\stax-api-1.0-2.jar;C:\Users\Arafeh\.m2\repository\org\drools\drools-canonical-model\7.31.0.Final\drools-canonical-model-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\drools\drools-model-compiler\7.31.0.Final\drools-model-compiler-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\mvel\mvel2\2.4.4.Final\mvel2-2.4.4.Final.jar;C:\Users\Arafeh\.m2\repository\org\drools\drools-core-reflective\7.31.0.Final\drools-core-reflective-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\com\github\javaparser\javaparser-core\3.13.10\javaparser-core-3.13.10.jar;C:\Users\Arafeh\.m2\repository\org\drools\drools-mvel-parser\7.31.0.Final\drools-mvel-parser-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\jboss\spec\javax\annotation\jboss-annotations-api_1.2_spec\1.0.0.Final\jboss-annotations-api_1.2_spec-1.0.0.Final.jar;C:\Users\Arafeh\.m2\repository\org\drools\drools-mvel-compiler\7.31.0.Final\drools-mvel-compiler-7.31.0.Final.jar;C:\Users\Arafeh\.m2\repository\commons-io\commons-io\2.6\commons-io-2.6.jar;C:\Users\Arafeh\.m2\repository\org\jfree\jfreechart\1.5.0\jfreechart-1.5.0.jar;C:\Users\Arafeh\.m2\repository\org\apache\commons\commons-lang3\3.8.1\commons-lang3-3.8.1.jar;C:\Users\Arafeh\.m2\repository\org\slf4j\slf4j-api\1.7.26\slf4j-api-1.7.26.jar;C:\Users\Arafeh\.m2\repository\ch\qos\logback\logback-classic\1.2.3\logback-classic-1.2.3.jar;C:\Users\Arafeh\.m2\repository\ch\qos\logback\logback-core\1.2.3\logback-core-1.2.3.jar;C:\Users\Arafeh\.m2\repository\com\thoughtworks\xstream\xstream\1.4.11.1\xstream-1.4.11.1.jar;C:\Users\Arafeh\.m2\repository\xmlpull\xmlpull\1.1.3.1\xmlpull-1.1.3.1.jar;C:\Users\Arafeh\.m2\repository\xpp3\xpp3_min\1.1.4c\xpp3_min-1.1.4c.jar;C:\Users\Arafeh\.m2\repository\org\jdom\jdom\1.1.3\jdom-1.1.3.jar;C:\Users\Arafeh\.m2\repository\org\apache\poi\poi\3.17\poi-3.17.jar;C:\Users\Arafeh\.m2\repository\commons-codec\commons-codec\1.10\commons-codec-1.10.jar;C:\Users\Arafeh\.m2\repository\org\apache\commons\commons-collections4\4.1\commons-collections4-4.1.jar;C:\Users\Arafeh\.m2\repository\org\apache\poi\poi-ooxml\3.17\poi-ooxml-3.17.jar;C:\Users\Arafeh\.m2\repository\org\apache\poi\poi-ooxml-schemas\3.17\poi-ooxml-schemas-3.17.jar;C:\Users\Arafeh\.m2\repository\org\apache\xmlbeans\xmlbeans\2.6.0\xmlbeans-2.6.0.jar;C:\Users\Arafeh\.m2\repository\com\github\virtuald\curvesapi\1.04\curvesapi-1.04.jar;C:\Users\Arafeh\.m2\repository\org\glassfish\javax.json\1.0.4\javax.json-1.0.4.jar" app.CLIStarter %1
